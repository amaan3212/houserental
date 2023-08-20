// Load user profile when the page loads
window.addEventListener('DOMContentLoaded', () => {
    loadUserProfile();
});

// Function to load user profile details
function loadUserProfile() {
    const userProfileDiv = document.getElementById('userProfile');
    userProfileDiv.innerHTML = '<p>Loading profile...</p>';

    // You can use fetch() or XMLHttpRequest to retrieve user profile data from the server
    // Replace 'get-user-profile.php' with the appropriate URL
    fetch('userprofile.php')
        .then(response => response.text())
        .then(data => {
            userProfileDiv.innerHTML = data;
        })
        .catch(error => {
            userProfileDiv.innerHTML = '<p>Error loading profile.</p>';
        });
}

// Function to load edit profile form
function loadEditProfileForm() {
    const editProfileFormDiv = document.getElementById('editProfileForm');
    editProfileFormDiv.innerHTML = '<p>Loading edit profile form...</p>';

    // You can use fetch() or XMLHttpRequest to retrieve the edit profile form HTML
    // Replace 'edit-profile-form.php' with the appropriate URL
    fetch('editprofile.php')
        .then(response => response.text())
        .then(data => {
            editProfileFormDiv.innerHTML = data;
        })
        .catch(error => {
            editProfileFormDiv.innerHTML = '<p>Error loading edit profile form.</p>';
        });
}

// Function to load post house pictures form
function loadPostHousePicturesForm() {
    const postHousePicturesFormDiv = document.getElementById('postHousePicturesForm');
    postHousePicturesFormDiv.innerHTML = '<p>Loading post house pictures form...</p>';

    // You can use fetch() or XMLHttpRequest to retrieve the post house pictures form HTML
    // Replace 'post-house-pictures-form.php' with the appropriate URL
    fetch('post-house-pictures-form.php')
        .then(response => response.text())
        .then(data => {
            postHousePicturesFormDiv.innerHTML = data;
        })
        .catch(error => {
            postHousePicturesFormDiv.innerHTML = '<p>Error loading post house pictures form.</p>';
        });
}
