<?php

// Эта функция генерирует теги INPUT и TEXTAREA для формы
// Принимает пять аргументов:
// - имя, присвоенное элементу, оно же будет присовено id=
// - тип элемента (text, password, textarea)
// - метка для элемента
// - массив ошибок
// - массив дополнительных параметров

function create_form_input($name, $type, $label = '', $errors = array(), $options = array()) {	

	// Предполагается, что значение уже существует
	$value = false;	

	// Проверка значения POST
	if (isset($_POST[$name])) $value = $_POST[$name];	

	// Если включены волшебные кавычки, убрать символы косой черты
	if ($value && get_magic_quotes_gpc()) $value = stripslashes($value);
    

	// Начало раздела DIV
	echo '<div class="form-group';
	// Если ошибка существует, добавить класс
	if (array_key_exists($name, $errors)) echo ' alert alert-danger';    
	// Завершение начального тега DIV
	echo '">';

	// При наличии метки создание элемента LABEL. (Отображаемая на форме подсказка для неправильно заполненного элемента формы).
	if (!empty($label)) echo '<label for="' . $name . '" class="control-label">' . $label . '</label>';	

    
	// Условное выражение, идентифицирующее тип создаваемого элемента
	if ( ($type === 'text') || ($type === 'password') || ($type === 'email')) {  // // создание области text или password или email

			// Начало создания поля ввода данных
			echo '<input type="' . $type . '" name="' . $name . '" id="' . $name . '" class="form-control"';
			// Добавление значения в поле ввода данных
			if ($value) echo ' value="' . htmlspecialchars($value) . '"';
			// Проверка дополнительных параметров
			if (!empty($options) && is_array($options)) {
				foreach ($options as $k => $v) {
					echo " $k=\"$v\"";  // Вывод на экран
				}
			}
			// Завершение элемента
			echo '>';			

			// В случае возникновения ошибки отображение соответствующего сообщения.
			// Т.е. если в массиве errors есть ключ name, то выводим на экран значение, присвоенное нами элементу массива $errors[name].
			if (array_key_exists($name, $errors)) echo '<span class="help-block">' . $errors[$name] . '</span>';		

        
	 } elseif ($type === 'textarea') { // создание области TEXTAREA		

		// Отображение сообщения об ошибке над текстовой областью (при наличии ошибки)
		if (array_key_exists($name, $errors)) echo '<span class="help-block">' . $errors[$name] . '</span>';
		// Начало создания текстовой области TEXTAREA
		echo '<textarea name="' . $name . '" id="' . $name . '" class="form-control"';	
		// Проверка дополнительных параметров
		if (!empty($options) && is_array($options)) {
			foreach ($options as $k => $v) {
				echo " $k=\"$v\"";
			}
		}		
		// Завершение открывающего тега
		echo '>';
		

		// Добавление значения в текстовую область
		if ($value) echo $value;

		// Завершение текстовой области
		echo '</textarea>';	
        
	  } // завершение основного блока IF-ELSE		

	// Завершение раздела DIV (~23 строка)
	echo '</div>';	

} // завершение функции create_form_input()

// Пропуск закрывающего тега PHP во избежание ошибок 'headers already sent'!