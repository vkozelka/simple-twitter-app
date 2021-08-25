<?php

use Latte\Runtime as LR;

/** source: /var/www/html/templates/index.latte */
final class Templateeed7b2ac95 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		echo "\n";
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['tweet' => '5'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		$this->parentName = "layout.latte";
		
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($statuses) /* line 4 */ {
			echo '    <div>
';
			$iterations = 0;
			foreach ($statuses as $tweet) /* line 5 */ {
				echo '            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-person"></i> <a
                                href="https://twitter.com/';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($tweet["user"]["screen_name"])) /* line 8 */;
				echo '"
                                target="_blank">';
				echo LR\Filters::escapeHtmlText($tweet["user"]["screen_name"]) /* line 9 */;
				echo '</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">';
				echo LR\Filters::escapeHtmlText(($this->filters->date)($tweet["created_at"], '%d.%m.%Y %H:%M')) /* line 10 */;
				echo '</h6>
                    ';
				echo LR\Filters::escapeHtmlText($tweet["text"]) /* line 11 */;
				echo '
                </div>
                <div class="card-footer">
                    <i class="bi bi-link-45deg"></i> <a href="https://twitter.com/machal/status/';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($tweet["id"])) /* line 14 */;
				echo '"
                                                        target="_blank">Přejít na tweet</a>
                </div>
            </div>
';
				$iterations++;
			}
			echo '    </div>
';
		}
		if ($error) /* line 19 */ {
			echo '    <div>
        <div class="alert alert-danger">';
			echo LR\Filters::escapeHtmlText($error["message"]) /* line 20 */;
			echo '</div>
    </div>
';
		}
		
	}

}
