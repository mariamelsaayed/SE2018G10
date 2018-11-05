from django.contrib import admin
from django.urls import path
from . import views

urlpatterns = [
    # path('', views.grades, name='grade'),
    path('', views.sortBy, name='grade'),
    path('results/', views.search_grade, name='gradeSearch'),
    path('add-grade/', views.add_grade, name='gradeAdd'),
    path('edit-grade/<int:id>/', views.edit_grade, name='gradeEdit'),
    path('<int:id>/delete-grade/', views.delete_grade, name='gradeDelete'),
]
