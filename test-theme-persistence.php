<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$user = App\Models\User::first();

echo "=== ESTADO ACTUAL DEL TEMA ===\n";
echo "Usuario: " . $user->name . "\n";
echo "Tema en DB: " . ($user->theme ?? 'NULL') . "\n";

// Cambiar a tema oscuro para probar persistencia
$user->theme = 'dark';
$user->save();

echo "Tema cambiado a: " . $user->theme . "\n";
echo "\n=== INSTRUCCIONES DE PRUEBA ===\n";
echo "1. Recarga la página (Ctrl+F5)\n";
echo "2. La página DEBE cargar en modo oscuro\n";
echo "3. Haz clic en el botón de tema\n";
echo "4. El tema DEBE cambiar a claro y MANTENERSE\n";
echo "5. Haz clic nuevamente\n";
echo "6. El tema DEBE cambiar a oscuro y MANTENERSE\n";
echo "\nSi el tema sigue cambiando y volviendo, hay un conflicto JavaScript.\n";
