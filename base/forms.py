from django.forms import ModelForm, TextInput, Select, NumberInput
from .models import Bookmarks


class BookmarkForm(ModelForm):
    class Meta:
        model = Bookmarks
        fields = ('name', 'alt_names', 'category', 'current', 'latest', 'status', 'read_status')

        widgets = {
            'name': TextInput(attrs={'class': 'form-control'}),
            'alt_names': TextInput(attrs={'class': 'form-control'}),
            'category': Select(attrs={'class': 'form-control'}),
            'current': NumberInput(attrs={'class': 'form-control', 'step': '0.1'}),
            'latest': NumberInput(attrs={'class': 'form-control', 'step': '0.1'}),
            'status': Select(attrs={'class': 'form-control'}),
            'read_status': Select(attrs={'class': 'form-control'}),
        }