# Generated by Django 4.2.2 on 2023-06-07 09:12

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('base', '0007_alter_bookmarks_read_status_alter_bookmarks_status'),
    ]

    operations = [
        migrations.AddField(
            model_name='websites',
            name='restriction',
            field=models.IntegerField(default=0),
        ),
    ]