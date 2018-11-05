from django import forms
from .models import student


class PostForm(forms.ModelForm):
    class Meta:
        model = student
        fields = [
            'id',
            'name',
        ]
