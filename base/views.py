from django.shortcuts import render, redirect
from django.core.paginator import Paginator
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required
from django.contrib import messages

from .models import Categories, Statuses, ReadStatuses, Websites, Bookmarks
from .forms import BookmarkForm

# Create your views here.
def home(request):
    bookmarks_obj = Bookmarks.objects.all()
    pagination = Paginator(bookmarks_obj, 50)
    page = request.GET.get('page')

    bookmarks = pagination.get_page(page)
    bookmarks.paginator_range = range(1, bookmarks.paginator.num_pages + 1)
    bookmarks.total = bookmarks_obj.count()

    context = {
        'title': "Personal bookmark site",
        'bookmarks': bookmarks,
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