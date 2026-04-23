@extends('main')

@section('home')
@php
    $groupedFoods = $foods->groupBy('food_type');
@endphp

<div id="menu-alert-placeholder">
    @if(session('cart_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 0 0 20px; max-width: 100%; text-align: center;" id="cart-success-alert">
            <i class="fas fa-check-circle"></i> {{ session('cart_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 0 0 20px; max-width: 100%; text-align: center;" id="cart-error-alert">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<style>
.cart-section {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.quantity-group {
    display: flex;
    align-items: center;
    gap: 8px;
}

.quantity-label {
    color: #cda45e;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.quantity-input {
    width: 70px;
    padding: 8px 10px;
    border: 2px solid #cda45e;
    border-radius: 4px;
    background-color: rgba(255, 255, 255, 0.05);
    color: #fff;
    font-weight: 600;
    text-align: center;
    transition: all 0.3s ease;
}

.quantity-input:focus {
    outline: none;
    background-color: rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 8px rgba(205, 164, 94, 0.5);
}

.quantity-input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.btn-add-to-cart {
    flex: 1;
    padding: 10px 20px;
    background: linear-gradient(135deg, #cda45e 0%, #a0823a 100%);
    color: white;
    border: none;
    border-radius: 4px;
    font-weight: 700;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    box-shadow: 0 4px 15px rgba(205, 164, 94, 0.3);
}

.btn-add-to-cart:hover {
    background: linear-gradient(135deg, #d4b570 0%, #b89446 100%);
    box-shadow: 0 6px 20px rgba(205, 164, 94, 0.5);
    transform: translateY(-2px);
}

.btn-add-to-cart:active {
    transform: translateY(0);
    box-shadow: 0 2px 10px rgba(205, 164, 94, 0.3);
}

.btn-add-to-cart i {
    font-size: 1.1rem;
}

.auth-buttons-container {
    display: flex;
    gap: 12px;
    justify-content: center;
    margin-top: 15px;
    flex-wrap: wrap;
}

.btn-auth {
    padding: 12px 28px;
    background: linear-gradient(135deg, #cda45e 0%, #a0823a 100%);
    color: white;
    border: none;
    border-radius: 4px;
    font-weight: 700;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    box-shadow: 0 4px 15px rgba(205, 164, 94, 0.3);
}

.btn-auth:hover {
    background: linear-gradient(135deg, #d4b570 0%, #b89446 100%);
    box-shadow: 0 6px 20px rgba(205, 164, 94, 0.5);
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

.btn-auth:active {
    transform: translateY(0);
    box-shadow: 0 2px 10px rgba(205, 164, 94, 0.3);
}
</style>

<div class="row isotope-container" data-aos="fade-up" data-aos-delay="200">
@foreach(['Starters', 'Salads', 'Specialty'] as $category)
    @if(isset($groupedFoods[$category]) && $groupedFoods[$category]->count() > 0)
        @foreach($groupedFoods[$category] as $food)
            <div class="col-lg-6 menu-item isotope-item filter-{{ strtolower($category) }}">
                <img src="{{ asset('food_img/'.$food->food_image) }}" class="menu-img" alt="{{ $food->food_name }}">
                <div class="menu-content">
                    <a href="#">{{ $food->food_name }}</a><span>${{ $food->food_price }}</span>
                </div>
                <div class="menu-ingredients">
                    {{ $food->food_details }}
                </div>
                <form action="{{route('addtocart')}}" method="POST" class="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="food_id" value="{{ $food->id }}">
                    <div class="cart-section">
                        <div class="quantity-group">
                            <label for="quantity_{{ $food->id }}" class="quantity-label">Qty:</label>
                            <input 
                                type="number" 
                                class="quantity-input" 
                                id="quantity_{{ $food->id }}" 
                                name="quantity" 
                                value="1" 
                                min="1"
                                max="999"
                            >
                        </div>
                        <button type="submit" class="btn-add-to-cart" data-food-id="{{ $food->id }}">
                            <i class="fas fa-shopping-cart"></i>Add to Cart
                        </button>
                    </div>
                </form>
            </div>
        @endforeach
    @endif
@endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle add to cart form submissions
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('.btn-add-to-cart');
            const originalText = submitButton.innerHTML;
            
            // Show loading state
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>Adding...';
            submitButton.disabled = true;
            
            fetch('{{ route("addtocart") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Reset button
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
                
                // Remove existing alerts
                document.getElementById('cart-success-alert')?.remove();
                document.getElementById('cart-error-alert')?.remove();
                
                if (data.success) {
                    // Show success message
                    showAlert('success', data.message);
                    
                    // Optional: Update cart count if you have one
                    if (data.cart_count !== undefined) {
                        updateCartCount(data.cart_count);
                    }
                } else {
                    // Show error message (can contain HTML)
                    showAlert('error', data.message, true);
                }
            })
            .catch(error => {
                // Reset button
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
                
                // Show error message
                showAlert('error', 'Something went wrong. Please try again.');
                console.error('Error:', error);
            });
        });
    });
    
    function showAlert(type, message, isHtml = false) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle';
        const alertId = type === 'success' ? 'cart-success-alert' : 'cart-error-alert';
        
        let messageHtml = message;
        if (!isHtml) {
            messageHtml = `<i class="fas ${iconClass}"></i> ${message}`;
        } else {
            messageHtml = `<i class="fas ${iconClass}"></i> ${message}`;
        }
        
        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert" 
                 style="margin: 0 0 20px; max-width: 100%; text-align: center;" id="${alertId}">
                ${messageHtml}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        
        // Insert into the dedicated alert placeholder above the menu
        const alertPlaceholder = document.querySelector('#menu-alert-placeholder');
        if (alertPlaceholder) {
            alertPlaceholder.innerHTML = alertHtml;
        } else {
            document.body.insertAdjacentHTML('afterbegin', alertHtml);
        }
        
        // Auto-dismiss after 5 seconds only for success messages (not for errors with links)
        if (type === 'success') {
            setTimeout(() => {
                const alert = document.getElementById(alertId);
                if (alert) {
                    alert.remove();
                }
            }, 5000);
        }
    }
    
    function updateCartCount(count) {
        // Update cart count if you have a cart counter element
        const cartCounter = document.querySelector('.cart-count');
        if (cartCounter) {
            cartCounter.textContent = count;
        }
    }
});
</script>s

@endsection

