from django.shortcuts import render, get_object_or_404, redirect
from .models import course
from django.db.models import Q
from .forms import CourseForm

# Create your views here.


# class courseview(CreateView):
#     template = 'new_course.html'


def courses(request):
    courses_list = course.objects.all().order_by('id')

    return render(request, 'courses.html', {'courses_list': courses_list})


def search_course(request):
    template = 'courses.html'

    query = request.GET.get('q')

    if query:
        courses_list = course.objects.filter(Q(name__icontains=query))

    else:
        courses_list = course.objects.all().order_by('id')

    return render(request, template, {'courses_list': courses_list})


def add_course(request):
    template = 'new_student.html'

    form = CourseForm(request.POST or None)
    if form.is_valid():
        instance = form.save(commit=False)
        instance.save()
        return redirect('../../')

    context = {
        'form': form,
    }

    return render(request, template, context)


def edit_course(request, id):
    template = 'new_student.html'

    instance = get_object_or_404(course, id=id)

    form = CourseForm(request.POST or None, instance=instance)
    if form.is_valid():
        instance = form.save(commit=False)
        instance.save()
        return redirect('../../')

    context = {
        'form': form,
    }

    return render(request, template, context)


def delete_course(request, id):
    template = 'courses.html'

    instance = get_object_or_404(course, id=id)
    instance.delete()
    if True:
        return redirect('../../')

    courses_list = course.objects.all().order_by('id')

    return render(request, template, {'courses_list': courses_list})
