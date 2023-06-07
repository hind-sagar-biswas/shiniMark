from django.db import models

# Create your models here.
class Categories(models.Model):
    category = models.CharField(max_length=225, unique=True)
    restriction = models.IntegerField(default=0)
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self) -> str:
        return self.category

class Statuses(models.Model):
    icon = models.CharField(max_length=225, null=True, blank=True, default=None)
    status = models.CharField(max_length=225, unique=True)
    description = models.TextField(null=True, blank=True)
    created_at = models.DateTimeField(auto_now_add=True)
    
    def __str__(self) -> str:
        return self.status

class ReadStatuses(models.Model):
    icon = models.CharField(max_length=225, null=True, blank=True, default=None)
    read_status = models.CharField(max_length=225, unique=True)
    description = models.TextField(null=True, blank=True)
    created_at = models.DateTimeField(auto_now_add=True)
    
    def __str__(self) -> str:
        return self.read_status
    
class Websites(models.Model):
    type = models.CharField(max_length=225)
    name = models.CharField(max_length=225, unique=True)
    url = models.URLField(max_length=225, unique=True)
    restriction = models.IntegerField(default=0)
    created_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        ordering = ['-created_at', 'name']
    
    def __str__(self) -> str:
        return self.name
    
class Bookmarks(models.Model):
    name = models.CharField(max_length=225, unique=True)
    alt_names = models.CharField(max_length=225, unique=True, null=True, blank=True)
    link = models.URLField(max_length=225, null=True, blank=True)
    category = models.ForeignKey(Categories, on_delete=models.CASCADE)
    status = models.ForeignKey(Statuses, on_delete=models.SET_DEFAULT, default=1)
    read_status = models.ForeignKey(ReadStatuses, on_delete=models.SET_DEFAULT, default=1)
    current = models.FloatField(default=0)
    latest = models.FloatField(default=1)
    updated_at = models.DateTimeField(auto_now=True)
    created_at = models.DateTimeField(auto_now_add=True)\
    
    class Meta:
        ordering = ['-updated_at', '-created_at', 'name']
    
    def __str__(self) -> str:
        return self.name