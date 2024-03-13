from django.db import models

class Contact(models.Model):
    name = models.CharField(max_length=100)
    phone = models.IntegerField()
    address = models.CharField(max_length=200)
