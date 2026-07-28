<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo de Portal de Gestão (Estudo)</title>
    <style>
        /* ==================== ESTILIZAÇÃO (CSS) ==================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
            background-color: #f4f6f9;
        }

        /* Barra Superior (Header) */
        header {
            background-color: #1a5c96; /* Azul corporativo padrão */
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 10;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .user-info {
            font-size: 14px;
        }

        /* Container Principal */
        .main-container {
            display: flex;
            flex: 1;
            height: calc(100vh - 60px);
        }

        /* Menu Lateral (Sidebar) */
        aside {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        aside.collapsed {
            width: 0;
            overflow: hidden;
        }

        .menu-category {
            padding: 15px 20px 5px 20px;
            font-size: 12px;
            text-transform: uppercase;
            color: #7f8c8d;
            font-weight: bold;
        }

        .menu-item {
            padding: 12px 20px;
            color: #bdc3c7;
            text-decoration: none;
            display: block;
            border-left: 4px solid transparent;
            transition: 0.2s;
            cursor: pointer;
        }

        .menu-item:hover, .menu-item.active {
            background-color: #34495e;
            color: white;
            border-left-color: #3498db;
        }

        /* Área de Conteúdo (onde o iframe é carregado) */
        main {
            flex: 1;
            background-color: #eef2f5;
            position: relative;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
            background-color: white;
        }
    </style>
</head>
<body>

    <!-- ==================== ESTRUTURA (HTML) ==================== -->

    <!-- Barra de navegação superior -->
    <header>
        <div class="logo-area">
            <button class="toggle-btn" id="toggleMenu" title="Recolher/Expandir Menu">☰</button>
            <h2>MeuSistema SST</h2>
        </div>
        <div class="user-info">
            Olá, <strong>Daniel</strong> | Empresa: <strong>CONSTRUPERJ</strong>
        </div>
    </header>

    <div class="main-container">
        <!-- Menu Lateral -->
        <aside id="sidebar">
            <div class="menu-category">Cadastros</div>
            <a class="menu-item active" data-url="dashboard">Início / Painel</a>
            <a class="menu-item" data-url="empresa">Empresa / Cliente</a>
            <a class="menu-item" data-url="funcionario">Funcionários</a>
            
            <div class="menu-category">Saúde e Segurança</div>
            <a class="menu-item" data-url="aso">ASO Rápido</a>
            <a class="menu-item" data-url="riscos">Cadastro de Riscos</a>
            <a class="menu-item" data-url="epi">Controle de EPI</a>
        </aside>

        <!-- Área de visualização que carrega as páginas internas -->
        <main>
            <!-- O iframe funciona como o cadIFrame do SOC, carregando as telas sem atualizar a página inteira -->
            <iframe id="conteudoSistema" srcdoc="
                <div style='padding: 30px; font-family: sans-serif; color: #333;'>
                    <h1>Bem-vindo ao Painel de Controle</h1>
                    <p style='margin-top: 15px;'>Selecione uma opção no menu lateral para começar a operar o sistema.</p>
                </div>
            "></iframe>
        </main>
    </div>

    <!-- ==================== COMPORTAMENTO (JavaScript) ==================== -->
    <script>
        // 1. Alternar a exibição da barra lateral (Menu sanduíche)
        const toggleBtn = document.getElementById('toggleMenu');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });

        // 2. Navegação dinâmica através do iframe
        const menuItems = document.querySelectorAll('.menu-item');
        const iframe = document.getElementById('conteudoSistema');

        menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                // Remove a classe ativo de todos e adiciona no clicado
                menuItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');

                // Obtém a rota do atributo customizado 'data-url'
                const rota = item.getAttribute('data-url');

                // Simulação de carregamento de páginas diferentes dentro do iframe
                if (rota === 'dashboard') {
                    iframe.srcdoc = `
                        <div style="padding:30px; font-family:sans-serif;">
                            <h2>Dashboard Geral</h2>
                            <p>Visão geral de exames e entregas pendentes.</p>
                        </div>`;
                } else {
                    iframe.srcdoc = `
                        <div style="padding:30px; font-family:sans-serif;">
                            <h2>Tela de Cadastro: ${item.innerText}</h2>
                            <p>Esta tela simula o carregamento dinâmico da rota: <strong>/sistema/${rota}.action</strong></p>
                            <hr style="margin:20px 0; border:0; border-top:1px solid #ccc;">
                            <form onsubmit="event.preventDefault(); alert('Dados salvos com sucesso!');">
                                <label style="display:block; margin-bottom:5px;">Nome do Registro:</label>
                                <input type="text" placeholder="Digite aqui..." style="padding:8px; width:300px; margin-bottom:15px; display:block;">
                                <button type="submit" style="padding:8px 15px; background:#1a5c96; color:white; border:none; cursor:pointer;">Gravar Dados</button>
                            </form>
                        </div>`;
                }
            });
        });
    </script>
</body>
</html>