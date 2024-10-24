<?php 
    include 'connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind CSS Drag-and-Drop Builder</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- GrapesJS CSS and JS -->
    <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet"/>
    <script src="https://unpkg.com/grapesjs"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .gjs-block {
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
            margin: 5px;
            border-radius: 5px;
            transition: background-color 0.2s;
            position: relative; /* For positioning tooltip */
        }
        .gjs-block:hover {
            background-color: #f7fafc; /* Light gray on hover */
        }
        /* Tooltip styles */
        .tooltip {
            display: none;
            position: absolute;
            bottom: 100%; /* Position above the block */
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.875rem;
            z-index: 10;
            white-space: nowrap;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-4 text-center">
            <h1 class="text-3xl font-bold">Tailwind CSS Drag-and-Drop Builder</h1>
        </header>

        <!-- Main Content Area -->
        <div class="flex flex-1">
            <!-- Sidebar for Components -->
            <div class="bg-gray-200 w-1/4 p-4 overflow-y-auto">
                <h2 class="text-lg font-semibold mb-4">Components</h2>
                <div id="blocks" class="space-y-2">
                    <!-- Dynamically populated component blocks will be appended here -->
                </div>
            </div>

            <!-- GrapesJS Editor Area -->
            <div id="gjs" class="flex-1 bg-white p-4"></div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white p-4 text-center">
            <p>© 2024 Tailwind Builder. All rights reserved.</p>
        </footer>
    </div>
    
    <!-- Include the JS code to initialize GrapesJS -->
    <script>
        // Initialize GrapesJS Editor
        const editor = grapesjs.init({
            container: '#gjs',
            fromElement: true,
            height: '100%',
            width: 'auto',
            storageManager: false,
            plugins: ['gjs-blocks-basic'],
            styleManager: {
                sectors: [{
                    name: 'General',
                    open: false,
                    buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
                },{
                    name: 'Dimension',
                    open: false,
                    buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
                },{
                    name: 'Typography',
                    open: false,
                    buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-shadow'],
                }]
            },
            blockManager: {
                appendTo: '#blocks', // Appending blocks to the sidebar
                blocks: [
                    {
                        id: 'section', // Section block
                        label: '<b>Section</b>',
                        attributes: { class:'gjs-fonts gjs-f-section' },
                        content: `<section class="bg-gray-200 p-8 rounded"><h2 class="text-2xl">Section Title</h2><p>Section content goes here...</p></section>`,
                        tooltip: 'A section block for layout.',
                    },
                    {
                        id: 'text', // Text block
                        label: 'Text',
                        attributes: { class:'gjs-fonts gjs-f-text' },
                        content: '<div class="p-4"><p>Insert your text here</p></div>',
                        tooltip: 'A text block for inserting content.',
                    },
                    {
                        id: 'image', // Image block
                        label: 'Image',
                        attributes: { class:'gjs-fonts gjs-f-image' },
                        content: `<div class="p-4"><img class="w-full" src="https://via.placeholder.com/150" alt="Placeholder Image"></div>`,
                        tooltip: 'An image block.',
                    },
                    {
                        id: 'button',
                        label: 'Button',
                        content: '<button class="bg-blue-500 text-white px-4 py-2 rounded">Click me</button>',
                        category: 'Basic',
                        tooltip: 'A button component.',
                    },
                    {
                        id: 'card',
                        label: 'Card',
                        content: `
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <img class="w-full" src="https://via.placeholder.com/300" alt="Placeholder Image">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Card Title</div>
                                <p class="text-gray-700 text-base">
                                    This is a description of the card content.
                                </p>
                            </div>
                        </div>`,
                        category: 'Components',
                        tooltip: 'A card layout for displaying content.',
                    },
                    {
                        id: 'navbar',
                        label: 'Navbar',
                        content: `
                        <nav class="bg-gray-800 p-4">
                            <div class="container mx-auto">
                                <div class="flex justify-between">
                                    <a href="#" class="text-white text-lg font-bold">Logo</a>
                                    <div>
                                        <a href="#" class="text-gray-300 hover:text-white px-4">Home</a>
                                        <a href="#" class="text-gray-300 hover:text-white px-4">About</a>
                                        <a href="#" class="text-gray-300 hover:text-white px-4">Contact</a>
                                    </div>
                                </div>
                            </div>
                        </nav>`,
                        category: 'Components',
                        tooltip: 'A navigation bar for site navigation.',
                    },
                    {
                        id: 'form',
                        label: 'Form',
                        content: `
                        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Username
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                    Password
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                    Sign In
                                </button>
                            </div>
                        </form>`,
                        category: 'Forms',
                        tooltip: 'A form for user input.',
                    },
                    {
                        id: 'footer',
                        label: 'Footer',
                        content: `
                        <footer class="bg-gray-800 p-4">
                            <div class="container mx-auto text-center">
                                <p class="text-gray-300">© 2024 Tailwind Builder. All rights reserved.</p>
                            </div>
                        </footer>`,
                        category: 'Components',
                        tooltip: 'A footer for the page.',
                    }
                ]
            }
        });

        // Add tooltip functionality
        document.addEventListener('DOMContentLoaded', function() {
            const blocksContainer = document.getElementById('blocks');

            blocksContainer.addEventListener('mouseover', function(event) {
                if (event.target.classList.contains('gjs-block')) {
                    const tooltipText = event.target.getAttribute('data-tooltip');
                    if (tooltipText) {
                        const tooltip = document.createElement('div');
                        tooltip.className = 'tooltip';
                        tooltip.innerText = tooltipText;
                        event.target.appendChild(tooltip);
                        tooltip.style.display = 'block';
                    }
                }
            });

            blocksContainer.addEventListener('mouseout', function(event) {
                if (event.target.classList.contains('gjs-block')) {
                    const tooltip = event.target.querySelector('.tooltip');
                    if (tooltip) {
                        tooltip.remove();
                    }
                }
            });
        });

        // Set tooltip text for each block
        const blocks = document.querySelectorAll('.gjs-block');
        blocks.forEach(block => {
            const blockId = block.getAttribute('data-gjs-id');
            const blockData = editor.BlockManager.get(blockId);
            if (blockData) {
                block.setAttribute('data-tooltip', blockData.tooltip);
            }
        });
    </script>
</body>
</html>
