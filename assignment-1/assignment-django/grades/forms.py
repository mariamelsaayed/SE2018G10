from django import forms
from .models import grade


class GradeForm(forms.ModelForm):
    class Meta:
        model = grade
        fields = [
            'id',
            'student_name',
            'course_name',
            'examine_at',
            'degree',
        ]
