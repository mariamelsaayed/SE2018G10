from django.contrib import admin
from django.urls import path
from . import views

urlpatterns = [
    path('', views.courses, name='course'),
    path('results/', views.search_course, name='courseSearch'),
    path('add-course/', views.add_course, name='courseAdd'),
    path('edit-course/<int:id>/', views.edit_course, name='courseEdit'),
    path('<int:id>/delete-course/', views.delete_course, name='courseDelete'),
]
