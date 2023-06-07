# Generated by Django 4.2.2 on 2023-06-07 07:48

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('base', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='bookmarks',
            name='current',
            field=models.FloatField(default=0),
        ),
        migrations.AlterField(
            model_name='bookmarks',
            name='latest',
            field=models.FloatField(default=1),
        ),
        migrations.AlterField(
            model_name='categories',
            name='restriction',
            field=models.IntegerField(default=0),
        ),
    ]