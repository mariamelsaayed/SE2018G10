from django.shortcuts import render, get_object_or_404, redirect
from .models import grade
from django.db.models import Q
from .forms import GradeForm


def grades(request):
    grades_list = grade.objects.all().order_by('student_name')

    return render(request, 'grades.html', {'grades_list': grades_list})


def sortBy(request):
    if request.method == "GET":
        display_type = request.GET.get("sortBy", None)
        if display_type == 'option1':
            grades_list = grade.objects.all().order_by('student_name')

        else:
            grades_list = grade.objects.all().order_by('course_name')

        return render(request, 'grades.html', {'grades_list': grades_list})


def search_grade(request):
    template = 'grades.html'

    query = request.GET.get('q')

    if query:
        grades_list = grade.objects.filter(Q(degree__icontains=query))

    else:
        grades_list = grade.objects.all().order_by('student_name')

    return render(request, template, {'grades_list': grades_list})


def add_grade(request):
    template = 'new_student.html'

    form = GradeForm(request.POST or None)
    if form.is_valid():
        instance = form.save(commit=False)
        instance.save()
        return redirect('../../')

    context = {
        'form': form,
    }

    return render(request, template, context)


def edit_grade(request, id):
    template = 'new_student.html'

    instance = get_object_or_404(grade, id=id)

    form = GradeForm(request.POST or None, instance=instance)
    if form.is_valid():
        instance = form.save(commit=False)
        instance.save()
        return redirect('../../')

    context = {
        'form': form,
    }

    return render(request, template, context)


def delete_grade(request, id):
    template = 'grades.html'

    instance = get_object_or_404(grade, id=id)
    instance.delete()
    if True:
        return redirect('../../')

    grades_list = grade.objects.all().order_by('student_name')

    return render(request, template, {'grades_list': grades_list})
