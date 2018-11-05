from django.contrib import admin
from django.urls import path, include
from . import views
from django.contrib.staticfiles.urls import staticfiles_urlpatterns

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', views.home, name='home'),
    path('students/', include('students.urls')),
    path('courses/', include('courses.urls')),
    path('grades/', include('grades.urls')),
    #    path('grades/', include('grades.urls')),
]

urlpatterns += staticfiles_urlpatterns()
