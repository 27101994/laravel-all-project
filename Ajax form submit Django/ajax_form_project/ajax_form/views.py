from django.shortcuts import render
from django.http import JsonResponse
from .forms import ContactForm

def contact_form(request):
    if request.method == 'POST':
        form = ContactForm(request.POST)
        if form.is_valid():
            form.save()
            return JsonResponse({'success': 'Form submitted successfully!'})
        else:
            errors = form.errors.as_json()
            return JsonResponse({'error': errors}, status=400)
    else:
        form = ContactForm()
    return render(request, 'ajax_form/contact_form.html', {'form': form})
