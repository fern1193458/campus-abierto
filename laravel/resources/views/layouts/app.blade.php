<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus AI</title>
    <style>
        body { font-family: Inter, system-ui, sans-serif; margin: 0; background: #ffffff; color: #1f2937; }
        .container { max-width: 1080px; margin: 0 auto; padding: 24px; }
        header { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 0; }
        nav a { color: #1d4ed8; text-decoration: none; margin-right: 18px; font-weight: 600; }
        nav a:hover { color: #0b3d91; }
        .brand { font-weight: 700; font-size: 1.3rem; color: #1d4ed8; }
        .subtitle { color: #2563eb; }
        .card { background: #ffffff; border-radius: 18px; box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08); padding: 24px; margin-bottom: 24px; border: 1px solid rgba(29, 78, 216, 0.08); }
        .card.accent { background: #fffbeb; border-color: #fcd34d; }
        .button { display: inline-flex; align-items: center; justify-content: center; padding: 12px 20px; border-radius: 12px; border: none; cursor: pointer; background: #1d4ed8; color: #fff; text-decoration: none; box-shadow: 0 10px 24px rgba(29, 78, 216, 0.18); }
        .button.secondary { background: #f59e0b; color: #111827; }
        .button.ghost { background: transparent; color: #1d4ed8; border: 1px solid #1d4ed8; }
        .grid { display: grid; gap: 20px; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); }
        input, textarea, select { width: 100%; border: 1px solid #d1d5db; border-radius: 12px; padding: 14px; font-size: 0.98rem; margin-top: 8px; background: #ffffff; }
        input:focus, textarea:focus, select:focus { outline: none; border-color: #1d4ed8; box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15); }
        label { display: block; margin-top: 16px; font-weight: 600; color: #1d4ed8; }
        footer { text-align: center; color: #6b7280; margin-top: 40px; }
        .badge { display: inline-flex; align-items: center; gap: 6px; padding: 8px 12px; border-radius: 999px; background: #ffedd5; color: #92400e; font-weight: 700; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div>
                <div class="brand">Campus AI</div>
                <div style="color:#6b7280;">Gestión de contenidos, resúmenes y recomendaciones.</div>
            </div>
            <nav>
                <a href="{{ route('home') }}">Inicio</a>
                <a href="{{ route('documentos.index') }}">Documentos</a>
                <a href="{{ route('recomendaciones.index') }}">Recomendaciones</a>
                <a href="{{ route('historial') }}">Historial</a>
                <a class="button secondary" href="{{ route('login') }}">Login</a>
            </nav>
        </header>

        @yield('content')

        <footer>
            © 2026 Campus AI - Interfaz de gestión adaptada a tus necesidades.
        </footer>
    </div>
</body>
</html>
