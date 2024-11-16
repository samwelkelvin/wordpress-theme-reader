<?php

$finder = (new PhpCsFixer\Finder())
	->in(__DIR__)
	->exclude(array('bootstrap', 'storage', 'vendor', 'node_modules'))
	->name('*.php')
	->name('_ide_helper')
	->ignoreDotFiles(true)
	->ignoreVCS(true);

$ruleset = array(
	'@PSR12' => true,
	'indentation_type' => true,
	'phpdoc_separation' => true,
	'array_indentation' => true,
	'array_syntax' => array('syntax' => 'long'),
	'combine_consecutive_unsets' => true,
	'blank_line_before_statement' => true,
	'multiline_whitespace_before_semicolons' => true,
	'single_quote' => true,
	'blank_line_after_opening_tag' => true,
	'braces' => array('allow_single_line_closure' => true),
	'concat_space' => array('spacing' => 'one'),
	'declare_equal_normalize' => true,
	'function_typehint_space' => true,
	'single_line_comment_style' => true,
	'include' => true,
	'lowercase_cast' => true,
	'no_blank_lines_after_class_opening' => true,
	'no_closing_tag' => true,
	'no_empty_comment' => true,
	'no_extra_blank_lines' => array(
		'tokens' => array(
			'attribute',
			'break',
			'case',
			'continue',
			'curly_brace_block',
			'default',
			'extra',
			'parenthesis_brace_block',
			'return',
			'square_brace_block',
			'switch',
			'throw',
			'use',
		),
	),
	'no_multiline_whitespace_around_double_arrow' => true,
	'no_singleline_whitespace_before_semicolons' => true,
	'no_spaces_around_offset' => true,
	'no_whitespace_before_comma_in_array' => false,
	'no_whitespace_in_blank_line' => false,
	'no_trailing_whitespace_in_comment' => true,
	'object_operator_without_whitespace' => true,
	'space_after_semicolon' => true,
	'ternary_operator_spaces' => true,
	'trim_array_spaces' => true,
	'unary_operator_spaces' => true,
	'whitespace_after_comma_in_array' => true,
	'class_attributes_separation' => true,
);

return (new PhpCsFixer\Config())
	->setRules($ruleset)
	->setIndent("\t")
	->setLineEnding("\n")
	->setFinder($finder);
