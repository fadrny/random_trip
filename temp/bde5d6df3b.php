<?php

use Latte\Runtime as LR;

/** source: index.latte */
final class Templatebde5d6df3b extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vyletik</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<body>
    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Výlet stránka</span>
                </a>
            </header>

            <div class="p-5 mb-4  rounded-3 ';
		if ($already_successful) /* line 22 */ {
			echo 'bg-warning';
		}
		else /* line 22 */ {
			echo 'bg-light';
		}
		echo '">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">
                        <span>
                        ';
		if ($days_in_table < 1) /* line 26 */ {
			echo ' Vypadá to, že jsme ještě nezačali
                        ';
		}
		elseif ($already_successful === false) /* line 27 */ {
			echo ' Zatím to nedopadlo, uvidíme v dalším kole...
                        ';
		}
		else /* line 28 */ {
			echo ' A je to tady! Jedeme!
';
		}
		echo '                        </span>
                    </h1>
                    <p class="col-md-8 fs-4">

                    </p>
                    <button class="btn btn-lg ';
		if ($already_successful) /* line 35 */ {
			echo 'btn-outline-dark';
		}
		else /* line 35 */ {
			echo 'btn-primary';
		}
		echo '" onclick="window.location.href=window.location.href" type="button">Obnovit stránku</button>
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white rounded-3 ';
		if ($already_successful) /* line 41 */ {
			echo 'bg-success';
		}
		else /* line 41 */ {
			echo 'bg-dark';
		}
		echo '">
                        <h2>';
		if (isset($latest_record)) /* line 42 */ {
			echo '
                                ';
			echo LR\Filters::escapeHtmlText($latest_record['place']) /* line 43 */;
			echo "\n";
		}
		else /* line 44 */ {
			echo '                                Žádné místo ještě nebylo vylosováno
';
		}
		echo '                        </h2>
                        <p>
';
		if ($already_successful) /* line 49 */ {
			echo '                                No a přesně tam vyrážíme, tak si sbalte svých pět švestek a fičíme tam!
';
		}
		elseif (isset($latest_record)) /* line 51 */ {
			echo '                                To by bylo to místo, kam bychom vyrazili, jenže dneska to úplně neklaplo. Losování proběhlo ';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($latest_record['timestamp'], 'j. n. Y')) /* line 52 */;
			echo '. Tak snad příště.
';
		}
		echo '                        </p>
                        <a ';
		if (isset($maps_url)) /* line 55 */ {
			echo 'href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($maps_url)) /* line 55 */;
			echo '"';
		}
		echo ' class="btn btn-outline-light" type="button">Ukázat na mapě</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h2>Open-source</h2>
                        <p>
                            Každý vesnický jelito ví, že i tvoje máma je dneska open-source, takže i takhle srandička je na GitHubu. Že je to primitvní hloupost, kterou dokáže v případě potřeby nabouchat i slepej prvňák s jednou rukou? Jo, to je pravda. A co jako? Kdo se ptal?
                        </p>
                        <a class="btn btn-outline-secondary" href="https://github.com/fadrny" type="button">Mrknout na GitHub</a>
                    </div>
                </div>
            </div>

            <footer class="pt-3 mt-4 text-muted border-top">
                © 2021
            </footer>
        </div>
    </main>
</body>
';
		return get_defined_vars();
	}

}
