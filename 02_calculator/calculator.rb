def add(p1,p2)
  p1+p2
end

def subtract(p1,p2)
  p1-p2
end

def sum(p)
 total=0
  for item in p
   total+=item
  end
  
 total
end

def multiply(p)
 total=1
  for item in p
   total*=item
  end
 
 total
end

def power(n,pow)
 total=1; 
  pow.times do
  total*=n;
  end

 total
end

def factorial(n)
   if n ==0 
      1
   else
    n*factorial(n-1)
   end
end
