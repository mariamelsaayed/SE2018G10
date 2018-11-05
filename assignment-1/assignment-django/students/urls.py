from django.contrib import admin
from django.urls import path
from . import views

urlpatterns = [
    path('', views.students, name='student'),
    path('results/', views.search_student, name='studentSearch'),
    path('add-student/', views.add_student, name='studentAdd'),
    path('edit-student/<int:id>/', views.edit_student, name='studentEdit'),
    path('<int:id>/delete-student/', views.delete_student, name='studentDelete'),

]
