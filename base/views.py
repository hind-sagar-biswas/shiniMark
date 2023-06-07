from django.shortcuts import render, redirect
from django.core.paginator import Paginator

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

def websites(request):
    context = {
        'title': "Website List",
        'websites': Websites.objects.all(),
    }
    return render(request, 'base/websites/index.html', context)