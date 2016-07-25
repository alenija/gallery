<?php

namespace ImageGallery;

use Image\GalleryBundle\Entity\Image;

$i = new Image();

$class_info = new \ReflectionClass('i');
echo '<pre>';
Reflection::export($class_info);
echo '</pre>';

function classData( ReflectionClass $class )
{
    $details = "";
    $name = $class->getName();

    if ( $class->isUserDefined() ) {
        $details .= "$name -- класс определен пользователем<br>";
    }

    if ( $class->isInternal() ) {
        $details .= "$name -- встроенный класс<br>";
    }

    if ( $class->isInterface() ) {
        $details .= "$name -- это интерфейс<br>";
    }

    if ( $class->isAbstract() ) {
        $details .= "$name -- это абстрактный класс<br>";
    }

    if ( $class->isFinal() ) {
        $details .= "$name -- это завершенный класс (не поддерживает наследования)<br>";
    }

    if ( $class->isInstantiable() ) {
        $details .= "$name -- можно создать экземпляр этого класса<br>";
    } else {
        $details .= "$name -- нельзя создать экземпляр этого класса<br>";
    }
    return $details;
}

$class_info = new ReflectionClass('Image');
echo classData($class_info);