<?php

namespace tt\DataProvider;

use tt\Models\Testimonial;

class TestimonialsProvider
{

    /** @var \PDO */
    public \PDO $connection;
    public $database;
    /** @var Testimonial[] */
    public array $testimonials;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        session_start();
        $this->connection = $database->getConnection();
        $this->database = $database;
        $this->testimonials = [];
    }

    public function getTestimonials()
    {
        $statement = $this->connection->prepare("SELECT * FROM testimonials");
        $statement->execute();

        $result = $statement->fetchAll();

        $this->createTestimonial($result);

        return $this->testimonials;
    }

    private function createTestimonial(array $values)
    {
        foreach ($values as $testimonialValues)  {

            $this->testimonials[] = new Testimonial(
                $testimonialValues["image"],
                $testimonialValues["name"],
                $testimonialValues["profession"],
                $testimonialValues["text"]
            );
        }
    }
}
