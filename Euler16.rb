sum = 0
number = (2**1000)

number = number.to_s.split('')
(number).each{|x| sum += x.to_i}

puts sum
