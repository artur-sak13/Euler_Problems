-- Counts the number of possible paths to take from the top left
-- to bottom right corners of a 20x20 grid moving only down and to the right
-- count_routes computes C(40, 20) (40 choose 20) or n!/k!(n-k)! = 40!/20!(40 - 20)!
main :: IO()
main = print $ count_routes
    where
        count_routes :: Integer
        count_routes = div (product [21..40]) (product [1..20])

