public class Euler7 {

public static void main(String [] args) {
	long myPrime = 2;
	long count = 0;
	long startTime = System.currentTimeMillis();
	long endTime;

	while (count != 10001) {
		if(checker(myPrime++) == true)
			count ++;
	}
	endTime = System.currentTimeMillis();
	System.out.println("\n" + (myPrime - 1));
	System.out.println("Execution Time: " + (endTime - startTime) + " ms");
}

public static boolean checker(long x) {
	for(long y = 2; y < x; y ++) {
		if (x % y == 0)
			return false;
	}
	return true;
}
}

