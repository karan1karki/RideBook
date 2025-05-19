/* When the user clicks on the button, toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn') && !event.target.matches('.layer')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function ridersbike() {
    document.getElementById("addRideModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("addRideModal").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("addBikeForm");

        if (form) {
            form.addEventListener("submit", function(e) {
                e.preventDefault();

                const bikeName = document.getElementById("bike_name").value;
                const model = document.getElementById("model").value;
                const cc = document.getElementById("cc").value;
                const price = document.getElementById("price").value;
                const imageFile = document.getElementById("bike_image").files[0];

                const reader = new FileReader();

                reader.onload = function () {
                    const base64Image = reader.result;

                    const newBike = {
                        name: bikeName,
                        model: model,
                        cc: cc,
                        price: price,
                        image: base64Image
                    };

                    let bikes = JSON.parse(localStorage.getItem("bikes")) || [];
                    bikes.push(newBike);
                    localStorage.setItem("bikes", JSON.stringify(bikes));

                    closeModal();
                    form.reset();
                    displayBike(newBike);
                };

                if (imageFile) {
                    reader.readAsDataURL(imageFile);
                }
            });
        }

        // Load existing bikes on page load
        const storedBikes = JSON.parse(localStorage.getItem("bikes")) || [];
        storedBikes.forEach(displayBike);
    });

    function displayBike(bike) {
        const container = document.querySelector(".services-container");

        const box = document.createElement("div");
        box.classList.add("box");
        box.innerHTML = `
            <div class="box-img">
                <img src="${bike.image}" alt="Bike Image">
            </div>
            <p>${bike.model}</p>
            <h3>${bike.name} Fi ${bike.cc}cc</h3>
            <h2>Rs.${bike.price}<span>/Day</span></h2>
            <a href="rent.php?model=${bike.model}&cc=${bike.cc}&image=${encodeURIComponent(bike.image)}&name=${encodeURIComponent(bike.name)}&place=YourPlace&days=1&price=${bike.price}" class="btn">Rent Now</a>
        `;
        container.appendChild(box);
    }