import Math.NumberTheory.Primes.Factorisation 
-- Finds the first triangle number to have over five hundred divisors
-- trinums creates an infinite stream of triangle numbers (i.e. 1 + 2 + 3 + 4 ...n)
-- numDivisors factorizes the triangular number and finds how many divisors it has
-- main simply extracts the first element of the filtered list of triangular numbers
-- where the number has more than 500 divisors and prints the value to STDOUT
main :: IO()
main = print . head $ filter (\x-> numDivisors x > 500) trinums
    where 
        numDivisors :: Integer -> Int
        numDivisors n = product [(snd x) + 1 | x <- (factorise n)]

        trinums :: [Integer]
        trinums = scanl1 (+) [1..]
