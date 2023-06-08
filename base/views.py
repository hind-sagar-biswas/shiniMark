from django.shortcuts import render, redirect
from django.core.paginator import Paginator
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required
from django.contrib import messages
from django.db.models import Q, F

from .models import Categories, Statuses, ReadStatuses, Websites, Bookmarks
from .forms import BookmarkForm

def filter_bookmarks(queryset, request):
    filters = request.GET

    if filters.get('search'):
        search_term = filters['search']
        queryset = queryset.filter(Q(name__icontains=search_term) | Q(alt_names__icontains=search_term))
    
    if filters.get('category') and filters['category'] != 'none':
        queryset = queryset.filter(category_id=filters['category'])
    
    if filters.get('status') and filters['status'] != 'none':
        queryset = queryset.filter(status_id=filters['status'])
    
    if filters.get('reading_status') and filters['reading_status'] != 'none':
        reading_status = filters['reading_status']
        if reading_status == 'catched_up':
            queryset = queryset.filter(current=F('latest'))
        elif reading_status == 'reading':
            queryset = queryset.filter(current__lt=F('latest'), current__gt=0)
        elif reading_status == 'not_started':
            queryset = queryset.filter(current=0)
    
    if filters.get('sort') and filters['sort'] != 'none':
        sort_field = filters['sort']
        order = '-' if filters.get('order') == 'desc' else ''
        sort_field = order + sort_field
        queryset = queryset.order_by(sort_field)
    
    return queryset

# Create your views here.
def home(request):
    authority = 1 if request.user.is_authenticated else 0

    bookmarks_obj = filter_bookmarks(Bookmarks.objects.all().filter(category__restriction__lte=authority), request)
    pagination = Paginator(bookmarks_obj, 50)
    page = request.GET.get('page')

    bookmarks = pagination.get_page(page)
    bookmarks.paginator_range = range(1, bookmarks.paginator.num_pages + 1)
    bookmarks.total = bookmarks_obj.count()


    context = {
        'title': "Personal bookmark site",
        'bookmarks': bookmarks,
        'categories': Categories.objects.all().filter(restriction__lte=authority),
        'statuses': Statuses.objects.all(),
        'read_statuses': ReadStatuses.objects.all(),
    }
    return render(request, 'base/bookmarks/index.html', context)

@login_required(login_url='login')
def createBookmark(request):
    form = BookmarkForm()

    if request.method == 'POST':
        form = BookmarkForm(request.POST)
        print(request.POST)
        if form.is_valid():
            form.save()
            return redirect('root')

    context = {
        'title': "Add a new Bookmark",
        'categories': Categories.objects.all(),
        'statuses': Statuses.objects.all(),
        'read_statuses': ReadStatuses.objects.all(),
        'form': form
    }
    return render(request, 'base/bookmarks/create.html', context)

@login_required(login_url='login')
def updateBookmark(request, pk):
    bookmark = Bookmarks.objects.get(id=pk)
    form = BookmarkForm()

    if request.method == 'POST':
        form = BookmarkForm(request.POST, instance=bookmark)
        print(request.POST)
        if form.is_valid():
            form.save()
            return redirect('root')

    context = {
        'title': f"Edit '{bookmark}'",
        'categories': Categories.objects.all(),
        'statuses': Statuses.objects.all(),
        'read_statuses': ReadStatuses.objects.all(),
        'bookmark': bookmark,
        'form': form
    }
    return render(request, 'base/bookmarks/update.html', context)

@login_required(login_url='login')
def deleteBookmark(request, pk):
    bookmark = Bookmarks.objects.get(id=pk)
    if request.method == 'POST':
        bookmark.delete()
        return redirect('root')

    context = {
        'title': f"Delete '{bookmark}'",
        'obj': bookmark,
        'type': 'bookmark'
    }
    return render(request, 'delete.html', context)

@login_required(login_url='login')
def websites(request):
    context = {
        'title': "Website List",
        'websites': Websites.objects.all(),
    }
    return render(request, 'base/websites/index.html', context)

def loginPage(request):
    if request.user.is_authenticated:
        return redirect('root')

    if request.method == 'POST':
        username = request.POST.get('username')
        password = request.POST.get('password')

        try:
            user = User.objects.get(username=username)
            user = authenticate(request, username=username, password=password)

            if user is not None:
                login(request, user)
                messages.success(request, 'Login Successfull')
                return redirect('root')
            else:
                messages.warning(request, 'Credentials might be wrong!')
        except Exception:
            messages.error(request, 'User does not exists!')

    context = {
        'title': "Login",
    }
    return render(request, 'base/users/login.html', context)

@login_required(login_url='login')
def logoutUser(request):
    if request.method == 'POST':
        messages.warning(request, 'You have been logged out!')
        logout(request)
    return redirect('root')