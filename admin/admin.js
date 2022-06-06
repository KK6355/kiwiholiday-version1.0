function deleteUser(user_id) {
  if (confirm("Are you sure you want to delete this User?")) {
    window.location.href = "../users/deleteUser.php?userId=" + user_id;
  }
}
