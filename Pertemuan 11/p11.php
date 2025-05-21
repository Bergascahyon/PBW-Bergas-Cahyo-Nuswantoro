<?php
class Book {
    private $code_book;
    private $name;
    private $qty;

    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }

    private function setCodeBook($code_book) {
        if (preg_match('/^[A-Z]{2}\d{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            throw new InvalidArgumentException("Error: Format code_book harus 'BBoo' (2 huruf besar diikuti 2 angka)");
        }
    }

    private function setQty($qty) {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            throw new InvalidArgumentException("Error: qty harus berupa integer positif");
        }
    }

    public function getCodeBook() {
        return $this->code_book;
    }

    public function getName() {
        return $this->name;
    }

    public function getQty() {
        return $this->qty;
    }
}

// Contoh penggunaan:
try {
    $book1 = new Book("AB12", "Programming Book", 10);
    echo "Code: " . $book1->getCodeBook() . ", Name: " . $book1->getName() . ", Qty: " . $book1->getQty() . "\n";
    
    // Contoh yang akan menghasilkan error
    // $book2 = new Book("a123", "Invalid Book", 5); // Error format code_book
    // $book3 = new Book("AB12", "Invalid Qty", -5); // Error qty negatif
    // $book4 = new Book("AB12", "Invalid Qty", 0); // Error qty nol
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
?>