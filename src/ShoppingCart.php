<?php
declare( strict_types = 1 );
namespace Ampliffy\Library2;

use Graftak\CountryCodeHelper;
use Carbon\Carbon;

class ShoppingCart
{
	protected array $items;
	protected ?string $country;
	protected Carbon $date;

	public function __construct($person, string $codeCountry)
	{
		$this->person = $person;
		$this->date = Carbon::now();
		$this->setCountry($codeCountry);
	}

	public function addItem($item): void
	{
		$this->items[] = $item;
	}

	public function getItems(): array
	{
		return $this->items ?? [];
	}

	public function getItem(int $key)
	{
		return $this->items[$key] ?? null;
	}

	public function setCountry(?string $codeCountry): void
	{
		$this->country = CountryCodeHelper::map($codeCountry, 'ALPHA_3');
	}

	public function getCountry(): ?string
	{
		return $this->country;
	}

	public function getDate()
	{
		return $this->date;
	}
}