from django.db import models
from django.core.validators import MinValueValidator, MaxValueValidator
from students.models import student
from courses.models import course
import datetime

# Create your models here.


class grade(models.Model):
    student_name = models.ForeignKey(student, on_delete=models.CASCADE)
    course_name = models.ForeignKey(course, on_delete=models.CASCADE)
    examine_at = models.DateField(default=datetime.datetime.now())
    degree = models.PositiveSmallIntegerField(
        validators=[MaxValueValidator(300)])

    def __str__(self):
        return ("Grade of " + self.student_name.id + " in " + self.course_name.id)
