from django import forms
from .models import course


class CourseForm(forms.ModelForm):
    class Meta:
        model = course
        fields = [
            'id',
            'name',
            'year',
            'max_degree',
        ]
