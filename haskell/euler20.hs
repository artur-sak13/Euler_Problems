import Data.Char(digitToInt)
-- Sums all of the digits in 100!
-- Maps the integer type on every value in the factorial string
-- and sums the values
main :: IO()
main = print . sum . map digitToInt . show $ product [2..100]