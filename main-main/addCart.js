// Tableau pour stocker les articles ajoutés au panier
let cart = [];

// Fonction pour ajouter un article au panier
function addToCart(itemName, itemPrice) {
    const existingItem = cart.find(item => item.name === itemName);
    if (existingItem) {
        existingItem.quantity++; // Si l'article existe déjà, on augmente la quantité
    } else {
        cart.push({ name: itemName, price: itemPrice, quantity: 1 }); // Sinon, on l'ajoute avec une quantité de 1
    }
    updateCartIcon();
    alert(`${itemName} has been added to the cart!`);
}

// Fonction pour mettre à jour le compteur du panier
function updateCartIcon() {
    const cartCount = document.getElementById('cart-count');
    cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0); // Mettre à jour le nombre total d'articles
}

// Fonction pour afficher les articles du panier dans le modal
function displayCartItems() {
    const modal = document.getElementById('cart-modal');
    const modalContent = document.getElementById('cart-modal-content');

    // Effacer le contenu précédent
    modalContent.innerHTML = "";

    // Vérifier si le panier est vide
    if (cart.length === 0) {
        modalContent.innerHTML = "<p>Your cart is empty!</p>";
    } else {
        const itemList = document.createElement('ul');
        itemList.style.listStyleType = "none";
        itemList.style.padding = "0";
        itemList.style.textAlign = "left";

        cart.forEach((item, index) => {
            const listItem = document.createElement('li');
            listItem.style.margin = "10px 0";
            listItem.style.padding = "10px";
            listItem.style.border = "1px solid #ddd"; // Ajouter la bordure autour de chaque produit
            listItem.style.borderRadius = "5px"; // Ajouter un léger arrondi aux coins
            listItem.style.backgroundColor = "#f9f9f9"; // Couleur de fond claire pour chaque produit
            listItem.style.boxShadow = "0 2px 4px rgba(0, 0, 0, 0.1)"; // Ajouter une légère ombre pour un effet visuel

            // Créer des éléments pour afficher le nom, la quantité et le prix
            const itemText = document.createElement('span');
            itemText.textContent = `${index + 1}. ${item.name} - ${item.price} x ${item.quantity}`;

            // Bouton de diminution de la quantité
            const decreaseBtn = document.createElement('button');
            decreaseBtn.textContent = "-";
            decreaseBtn.style.marginLeft = "10px";
            decreaseBtn.style.padding = "5px";
            decreaseBtn.style.backgroundColor = "#f0f0f0";
            decreaseBtn.style.border = "1px solid #ddd";
            decreaseBtn.style.borderRadius = "5px";
            decreaseBtn.style.cursor = "pointer";
            decreaseBtn.onclick = function() {
                if (item.quantity > 1) {
                    item.quantity--; // Réduire la quantité
                    updateCartIcon();
                    displayCartItems(); // Rafraîchir le modal
                }
            };

            // Bouton d'augmentation de la quantité
            const increaseBtn = document.createElement('button');
            increaseBtn.textContent = "+";
            increaseBtn.style.marginLeft = "10px";
            increaseBtn.style.padding = "5px";
            increaseBtn.style.backgroundColor = "#f0f0f0";
            increaseBtn.style.border = "1px solid #ddd";
            increaseBtn.style.borderRadius = "5px";
            increaseBtn.style.cursor = "pointer";
            increaseBtn.onclick = function() {
                item.quantity++; // Augmenter la quantité
                updateCartIcon();
                displayCartItems(); // Rafraîchir le modal
            };

            // Bouton de suppression
            const removeBtn = document.createElement('button');
            removeBtn.textContent = "Remove";
            removeBtn.style.marginLeft = "10px";
            removeBtn.style.padding = "5px";
            removeBtn.style.backgroundColor = "#f44336";
            removeBtn.style.border = "1px solid #ddd";
            removeBtn.style.borderRadius = "5px";
            removeBtn.style.color = "white";
            removeBtn.style.cursor = "pointer";
            removeBtn.onclick = function() {
                // Supprimer l'article du panier
                cart.splice(index, 1); 
                updateCartIcon();
                displayCartItems(); // Rafraîchir le modal après suppression
            };

            // Ajouter les boutons et le texte dans la liste
            listItem.appendChild(itemText);
            listItem.appendChild(decreaseBtn);
            listItem.appendChild(increaseBtn);
            listItem.appendChild(removeBtn);
            itemList.appendChild(listItem);
        });

        modalContent.appendChild(itemList);

        // Ajouter l'affichage du total
        const totalText = document.createElement('p');
        totalText.style.fontWeight = "bold";
        totalText.textContent = `Total: $${calculateTotal().toFixed(2)}`; // Afficher le total formaté
        modalContent.appendChild(totalText);
    }

    // Afficher la modale
    modal.style.display = "flex";
}

// Fonction pour calculer le total du panier
function calculateTotal() {
    return cart.reduce((total, item) => total + (item.price * item.quantity), 0); // Calculer le total des articles
}

// Attacher des événements "Add to Cart" aux boutons
document.querySelectorAll('.btn.btn-primary').forEach((button) => {
    button.addEventListener('click', (event) => {
        const overlay = event.target.closest('.portfolio_images_overlay');
        const itemName = overlay.querySelector('h6').textContent;
        const itemPrice = parseFloat(overlay.querySelector('.product_price').textContent.replace('$', ''));

        addToCart(itemName, itemPrice);
    });
});

// Ajouter un événement pour afficher la modale lors du clic sur l'icône du panier
document.getElementById('cart-icon').addEventListener('click', displayCartItems);

// Ajouter un événement pour fermer la modale
document.getElementById('close-modal').addEventListener('click', () => {
    document.getElementById('cart-modal').style.display = "none";
});

// S'assurer que le modal ne s'affiche pas par défaut
window.onload = function () {
    document.getElementById('cart-modal').style.display = "none";
};






// Fonction pour afficher le formulaire de connexion
function showLoginForm() {
    const cartContent = document.getElementById('cart-modal-content');
    const loginForm = document.getElementById('login-form');

    // Remplacer le contenu de la modale par le formulaire de connexion
    cartContent.innerHTML = '';  // Vider le contenu du panier
    cartContent.appendChild(loginForm);  // Ajouter le formulaire de connexion
    document.getElementById('login-form').style.display = "block";
}

// Attacher un événement au bouton "Voir Panier"
document.getElementById('view-cart').addEventListener('click', function () {
    showLoginForm(); // Afficher le formulaire de connexion
    document.getElementById('cart-modal').style.display = "flex";  // Afficher la modale
});

// Fermer la modale
document.getElementById('close-modal').addEventListener('click', function () {
    document.getElementById('cart-modal').style.display = "none";  // Masquer la modale
});











