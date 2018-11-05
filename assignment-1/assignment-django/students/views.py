from django.shortcuts import render, get_object_or_404, redirect
from .models import student
from django.db.models import Q
from .forms import PostForm

# Create your views here.


# class Studentview(CreateView):
#     template = 'new_student.html'


def students(request):
    students_list = student.objects.all().order_by('id')

    return render(request, 'students.html', {'students_list': students_list})


def search_student(request):
    template = 'students.html'

    query = request.GET.get('q')

    if query:
        students_list = student.objects.filter(Q(name__icontains=query))

    else:
        students_list = student.objects.all().order_by('id')

    return render(request, template, {'students_list': students_list})


# def add_student(request):
#     template = 'new_student.html'
#     obj = student(id=request.POST.get('id'), name=request.POST.get('name'))

#     return render(request, template, {'obj': obj})


def add_student(request):
    template = 'new_student.html'

    form = PostForm(request.POST or None)
    if form.is_valid():
        instance = form.save(commit=False)
        instance.save()
        return redirect('../../')

    context = {
        'form': form,
    }

    return render(request, template, context)


def edit_student(request, id):
    template = 'new_student.html'

    instance = get_object_or_404(student, id=id)

    form = PostForm(request.POST or None, instance=instance)
    if form.is_valid():
        instance = form.save(commit=False)
        instance.save()
        return redirect('../../')

    context = {
        'form': form,
    }

    return render(request, template, context)


def delete_student(request, id):
    template = 'students.html'

    instance = get_object_or_404(student, id=id)
    instance.delete()
    if True:
        return redirect('../../')

    students_list = student.objects.all().order_by('id')

    return render(request, template, {'students_list': students_list})
