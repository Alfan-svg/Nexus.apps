@if(session('success'))
<div class="success-alert bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4 flex justify-between items-center">
    <div class="flex items-center">
        <i class="fas fa-check-circle text-green-500 mr-2"></i>
        <span>{{ session('success') }}</span>
    </div>
    <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">
        <i class="fas fa-times"></i>
    </button>
</div>

<script>
    setTimeout(function() {
        const alert = document.querySelector('.success-alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(function() {
                if (alert && alert.parentNode) {
                    alert.remove();
                }
            }, 500);
        }
    }, 3000);
</script>
@endif