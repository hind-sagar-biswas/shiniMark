from django.urls import path
from . import views

urlpatterns = [
    path('', views.home, name="root"),
    path('bookmarks/add', views.createBookmark, name="bookmark-add"),
    path('bookmarks/<int:pk>/edit', views.updateBookmark, name="bookmark-update"),
    path('bookmarks/<int:pk>/delete', views.deleteBookmark, name="bookmark-delete"),
    path('websites', views.websites, name="website-list"),
]