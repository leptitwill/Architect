<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>404 - Conceptcub</title>
<style>
	* {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		vertical-align: baseline;
		box-sizing: border-box;
		font-family: "Raleway", helvetica, arial, sans-serif;
		text-decoration: none;
		outline: none;
		list-style: none;
	}

	body {
		background: #329899;
	}

	.no_found {
		width: 100%;
		color: white;
		width: 100%;
		max-width: 500px;
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
		padding: 1rem;
	}

	h1 {
		font-size: 6rem;
		margin-bottom: 1rem;
	}

	h3 {
		font-size: 3rem;
		font-weight: normal;
		margin-bottom: 2rem;
	}

	a {
		color: rgba(255,255,255,0.7);
		font-size: 1rem;
		transition: all .3s ease;
	}

	a:hover {
		color: white;
	}
</style>

</head>
<body>
	<section class="no_found">
		<h1>404</h1>
		<h3>Page introuvable</h3>
		<a href="http://localhost:8888/Conceptcub/">Cliquez ici pour retourner à l'accueil</a>
	</section>
</body>
</html>