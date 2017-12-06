require 'prime'

sum = 0
Prime.each(2_000_000) do |prime|
	sum += prime
end

puts sum
