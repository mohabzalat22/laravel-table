<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>live wire</title>
    @vite('resources/css/app.css','resources/js/app.js')
</head>
<body>
       <div class="p-1">
            <div class="w-full">
                {{-- @livewire('panel', [
                    'lazy' => true
                ]) --}}
              
            </div>
            <div class="w-1/4 ms-5">
                {{-- @livewire('form') --}}
            </div> 
            
       </div>
</body>
</html>