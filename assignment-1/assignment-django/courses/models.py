from django.db import models
import datetime
from django.core.validators import MinValueValidator, MaxValueValidator


# Create your models here.


class course(models.Model):
    name = models.CharField(max_length=100)
    year = models.PositiveSmallIntegerField(
        default=datetime.datetime.now().year)
    max_degree = models.PositiveSmallIntegerField(
        validators=[MinValueValidator(50), MaxValueValidator(300)])

    def __str__(self):
        return self.name
