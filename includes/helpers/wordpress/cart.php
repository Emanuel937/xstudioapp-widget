<?php

trait Cart
{
    protected ?WC_Cart $cart = null;

    protected function get_cart(): ?WC_Cart
    {    
        
        if ( $this->cart instanceof WC_Cart ) {
            return $this->cart;
        }
        // var_dump(new WC_Cart());
        if ( function_exists('WC') && WC()->cart ) {
            $this->cart = WC()->cart;
            return $this->cart;
        }

        return null;
    }

  
    public function get_cart_data(): array
    {
        $cart = $this->get_cart();

        if ( ! $cart ) {
            return [];
        }

        return [
            
            'items' => $cart->get_cart(), 
            'items_total_with_tax' => (
                $cart->get_cart_contents_total()
                + $cart->get_cart_contents_tax()
            ),
            'total_quantity' => $cart->get_cart_contents_count(),
            'items_count' => count($cart->get_cart()),
        ];
    }
}
