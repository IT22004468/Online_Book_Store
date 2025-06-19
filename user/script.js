function openEditpage(){
    window.location.href = "edit.html";
}

function deleteProfile() {
    if (confirm("Do you want to delete your account?")) {
      
        window.location.href = 'delete.php';
    }
}

function myFunction(){
        window.location.href="userprofile.php";
}