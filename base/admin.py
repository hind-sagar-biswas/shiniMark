from django.contrib import admin
from .models import Categories, Statuses, ReadStatuses, Websites, Bookmarks

# Register your models here.
admin.site.register([Categories, Statuses, ReadStatuses, Websites, Bookmarks])