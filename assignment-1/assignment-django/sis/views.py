from django.http import HttpResponse
from django.shortcuts import render


def home(request):
    return render(request, 'index.html')


def grade(request):
    return render(request, 'grades.html')
