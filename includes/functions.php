<?php // global functions: for all

function redirect_to($new_location) {
		header("Location: ".$new_location);
		exit;
	}

///////////////
// log in admin functions

function find_admin_by_username($username) {
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$admina_nabor = mysqli_query($connection, $query);
		// Test if there was a query error
		confirm_query($admina_nabor);
		
		if ($admin = mysqli_fetch_assoc($admina_nabor)) {
			return $admin; // $admin == $admin_array
		} else {
			return null;
		}
		
	}

function password_check($password, $existing_hash) {
		// существующий хэш включает в себя формат и соль в начале
		$hash = crypt($password, $existing_hash); 
		// функция crypt во втором аргументе обрезает всё по первые 22 знака, оставляя формат и соль, остальное откидывает.
		// Благодаря этому новоявленный пароль и существующий обрезанный хэш (= первоначальным формат и соль)
        // приводят к новой полной хэшированной строке, идентичной уже существующему первоначальному полному хэшу.
		if ($hash === $existing_hash) {
			return true;
		} else {
			return false;
		}
	}

function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			// если админ найден, то проверка его пароля
			if (password_check($password, $admin["hashed_password"])) {
				// пароль подходит
				return $admin;
			} else {
				// пароль не подходит
				return false;
			}
		
		} else {
			// если админ не найден, то false
			return false;			
		}
	}

function logged_in() {
		return isset($_SESSION['admin_id']);
	}
	
function confirm_logged_in() {
    if (!logged_in()){
        redirect_to("/admin/login.php");
    }
}

/////////////////

